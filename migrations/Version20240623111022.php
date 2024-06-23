<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240623111022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE books_user (books_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_AE1A76667DD8AC20 (books_id), INDEX IDX_AE1A7666A76ED395 (user_id), PRIMARY KEY(books_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE books_user ADD CONSTRAINT FK_AE1A76667DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE books_user ADD CONSTRAINT FK_AE1A7666A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books_user DROP FOREIGN KEY FK_AE1A76667DD8AC20');
        $this->addSql('ALTER TABLE books_user DROP FOREIGN KEY FK_AE1A7666A76ED395');
        $this->addSql('DROP TABLE books_user');
    }
}
