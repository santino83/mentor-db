<?php
/**
 * Created by PhpStorm.
 * User: santino83
 * Date: 01/06/19
 * Time: 19.22
 */

namespace Santino83\DB\DAO;


use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\Table;
use PHPUnit\Framework\TestCase;
use Santino83\DB\Entity\Student;

class StudentDaoTest extends TestCase
{

    /**
     * @var StudentDAO
     */
    private $dao;

    /**
     * @var Connection
     */
    private $conn;

    public function testFindAll()
    {
        $students = $this->dao->findAll();
        $this->assertCount(3, $students);
    }

    public function testFind()
    {
        $id = 1;
        $student = $this->dao->find($id);

        $this->assertNotNull($student);
        $this->assertEquals(1, $student->getId());
        $this->assertEquals('Mario', $student->getFirstName());
        $this->assertEquals('Rossi', $student->getLastName());
        $this->assertEquals('333', $student->getPhone());
    }

    public function testAdd()
    {
        $student = new Student();
        $student->setPhone('336')
            ->setLastName('Santini')
            ->setFirstName('Giorgio');

        $newID = $this->dao->add($student);
        $this->assertEquals(4, $newID);

        $this->assertCount(4, $this->dao->findAll());
    }

    public function testEdit()
    {
        $student = $this->dao->find(1);
        $this->assertEquals('Mario', $student->getFirstName());

        $student->setFirstName('Marione');

        $this->assertTrue($this->dao->edit($student));

        $student2 = $this->dao->find($student->getId());
        $this->assertEquals('Marione', $student2->getFirstName());
    }

    public function testDelete()
    {
        $this->assertCount(3, $this->dao->findAll());
        $this->assertTrue($this->dao->delete($this->dao->find(1)));
        $this->assertCount(2, $this->dao->findAll());
        $this->assertNull($this->dao->find(1));
    }

    protected function setUp(): void
    {
        $conn = $this->conn = $this->getConnection();
        $this->dao = new StudentDAO($conn);

        // create db (just student table
        $schema = $conn->getSchemaManager();

        if(!$schema->tablesExist('student'))
        {
            $table = new Table('student');
            $table->addColumn('id', 'integer', array('unsigned' => true, 'autoincrement' => true));
            $table->addColumn('FirstName', 'string', ['length' => 255, 'nullable' => false]);
            $table->addColumn('LastName', 'string', ['length' => 255, 'nullable' => false]);
            $table->addColumn('Phone', 'string', ['length' => 255, 'nullable' => false]);
            $table->setPrimaryKey(['id']);

            $schema->createTable($table);
        }

        // add demo data
        $data = [
            ['firstname' => 'Mario', 'lastname' => 'Rossi', 'phone' => '333'],
            ['firstname' => 'Sara', 'lastname' => 'Violetta', 'phone' => '334'],
            ['firstname' => 'Antonio', 'lastname' => 'Rigoni', 'phone' => '335'],
        ];

        foreach($data as $d){
            $this->conn->executeUpdate("insert into student(FirstName, LastName, Phone) values(:firstname, :lastname, :phone)", $d);
        }
    }

    protected function tearDown(): void
    {
        // delete student table
        $schema = $this->conn->getSchemaManager();

        if($schema->tablesExist('student')){
            $schema->dropTable('student');
        }

        $this->conn->close();
    }

    private function getConnection()
    {
        $config = new Configuration();
        $config->setAutoCommit(true);

        $conn = DriverManager::getConnection(['url' => 'sqlite:///:memory:'], $config);
        $conn->connect();

        return $conn;
    }

}