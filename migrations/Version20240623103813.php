<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240623103813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE critic ADD user_id_id INT DEFAULT NULL, CHANGE date_of_last_update date_of_last_update DATE NOT NULL');
        $this->addSql('ALTER TABLE critic ADD CONSTRAINT FK_C9E2F7F19D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C9E2F7F19D86650F ON critic (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE critic DROP FOREIGN KEY FK_C9E2F7F19D86650F');
        $this->addSql('DROP INDEX IDX_C9E2F7F19D86650F ON critic');
        $this->addSql('ALTER TABLE critic DROP user_id_id, CHANGE date_of_last_update date_of_last_update DATE DEFAULT NULL');
    }
}
