<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412095737 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE feedback (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, email LONGTEXT NOT NULL, phone LONGTEXT NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment CHANGE subtext subtext LONGTEXT NOT NULL');
        $this->addSql('DROP INDEX id ON navigation');
        $this->addSql('ALTER TABLE navigation CHANGE position position LONGTEXT NOT NULL, CHANGE name name LONGTEXT NOT NULL, CHANGE url url LONGTEXT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE requisites CHANGE text text LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE services CHANGE src src LONGTEXT NOT NULL, CHANGE urltext urltext LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE slider CHANGE imgurl imgurl LONGTEXT NOT NULL, CHANGE img2url img2url LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE solutions CHANGE blockname blockname LONGTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE feedback');
        $this->addSql('ALTER TABLE equipment CHANGE subtext subtext LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE navigation MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE navigation DROP INDEX primary, ADD UNIQUE INDEX id (id)');
        $this->addSql('ALTER TABLE navigation CHANGE position position INT DEFAULT NULL, CHANGE name name LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, CHANGE url url LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE requisites CHANGE text text LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE services CHANGE src src LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE urltext urltext LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE slider CHANGE imgurl imgurl LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img2url img2url LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE solutions CHANGE blockname blockname TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
