<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200331141622 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE match_task DROP FOREIGN KEY match_task_ibfk_1');
        $this->addSql('ALTER TABLE match_task DROP FOREIGN KEY match_task_ibfk_2');
        $this->addSql('DROP INDEX task_id ON match_task');
        $this->addSql('DROP INDEX developer_id ON match_task');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE match_task ADD CONSTRAINT match_task_ibfk_1 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE match_task ADD CONSTRAINT match_task_ibfk_2 FOREIGN KEY (developer_id) REFERENCES developer (id)');
        $this->addSql('CREATE INDEX task_id ON match_task (task_id)');
        $this->addSql('CREATE INDEX developer_id ON match_task (developer_id)');
    }
}
