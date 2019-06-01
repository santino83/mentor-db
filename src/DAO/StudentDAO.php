<?php
/**
 * Created by PhpStorm.
 * User: santino83
 * Date: 01/06/19
 * Time: 18.52
 */

namespace Santino83\DB\Dao;


use Doctrine\DBAL\Connection;
use Doctrine\DBAL\FetchMode;
use Santino83\DB\Entity\Student;

class StudentDAO
{

    private const SELECT_ALL = "select id, FirstName, LastName, Phone from student where 1=1";
    private const SELECT_ONE = "select id, FirstName, LastName, Phone from student where 1=1 and id=:id";
    private const CREATE = "insert into student(FirstName, LastName, Phone) values(:firstname, :lastname, :phone)";
    private const UPDATE = "update student set FirstName = :firstname, LastName = :lastname, Phone = :phone where 1=1 and id=:id";
    private const DELETE = "delete from student where 1=1 and id=:id";

    /**
     * @var Connection
     */
    private $conn;

    /**
     * StudentDAO constructor.
     * @param Connection $conn
     */
    public function __construct(Connection $conn)
    {
        $this->conn = $conn;
    }

    /**
     * @param int $id
     * @return Student|null
     * @throws \Doctrine\DBAL\DBALException
     */
    public function find(int $id): ?Student
    {
        $query = self::SELECT_ONE;

        $result = $this->conn->executeQuery($query,['id' => $id])->fetch(FetchMode::ASSOCIATIVE);

        if(!$result){
            return null;
        }

        return $this->mapArrayToStudent($result);
    }

    /**
     * @return Student[]
     * @throws \Doctrine\DBAL\DBALException
     */
    public function findAll(): array
    {

        $query = self::SELECT_ALL;
        $results = $this->conn->executeQuery($query)->fetchAll(FetchMode::ASSOCIATIVE);

        if(!$results){
            return [];
        }

        return array_map([$this,'mapArrayToStudent'], $results);
    }

    /**
     * @param Student $student
     * @return int|null the id of the inserted student
     * @throws \Doctrine\DBAL\DBALException
     */
    public function add(Student $student): int
    {
        $query = self::CREATE;

        $result = $this->conn->executeUpdate($query, [
            'firstname' => $student->getFirstName(), 'lastname' => $student->getLastName(), 'phone' => $student->getPhone()
        ]);

        return $result ? $this->conn->lastInsertId() : 0;
    }

    /**
     * @param Student $student
     * @return bool
     * @throws \Doctrine\DBAL\DBALException
     */
    public function edit(Student $student): bool
    {
        $query = self::UPDATE;

        $result = $this->conn->executeUpdate($query, [
            'id' => $student->getId(), 'firstname' => $student->getFirstName(), 'lastname' => $student->getLastName(), 'phone' => $student->getPhone()
        ]);

        return $result > 0;
    }

    /**
     * @param Student $student
     * @return bool
     * @throws \Doctrine\DBAL\DBALException
     */
    public function delete(Student $student): bool
    {
        $query = self::DELETE;

        $result = $this->conn->executeUpdate($query, ['id' => $student->getId()]);

        return $result > 0;
    }

    private function mapArrayToStudent(array $result): Student
    {
        $student = new Student($result['id']); // normalmente non si fa
        $student->setFirstName($result['FirstName'])
            ->setLastName($result['LastName'])
            ->setPhone($result['Phone']);

        // faccio una query alla tabella courses?
        // uso il coursesdao?
        // ho fatto una query di join?

        return $student;
    }

}