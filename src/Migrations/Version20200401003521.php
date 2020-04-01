<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200401003521 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE developer (id INT AUTO_INCREMENT NOT NULL, level INT NOT NULL,PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE match_task (id INT AUTO_INCREMENT NOT NULL, task_id INT NOT NULL, week INT NOT NULL,  developer_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, level INT NOT NULL, duration INT NOT NULL, type_id VARCHAR(255) NOT NULL, PRIMARY KEY(id), UNIQUE(type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('ALTER TABLE match_task ADD FOREIGN KEY (developer_id) REFERENCES developer(id)');
        $this->addSql('ALTER TABLE match_task ADD FOREIGN KEY (task_id) REFERENCES task(id)');

        $this->addSql('INSERT INTO developer(level) values (1)');
        $this->addSql('INSERT INTO developer(level) values (2)');
        $this->addSql('INSERT INTO developer(level) values (3)');
        $this->addSql('INSERT INTO developer(level) values (4)');
        $this->addSql('INSERT INTO developer(level) values (5)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE developer');
        $this->addSql('DROP TABLE match_task');
        $this->addSql('DROP TABLE task');
    }
}
