<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240127164022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE title ADD artist_id INT DEFAULT NULL, DROP artist');
        $this->addSql('ALTER TABLE title ADD CONSTRAINT FK_2B36786BB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('CREATE INDEX IDX_2B36786BB7970CF8 ON title (artist_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE title DROP FOREIGN KEY FK_2B36786BB7970CF8');
        $this->addSql('DROP INDEX IDX_2B36786BB7970CF8 ON title');
        $this->addSql('ALTER TABLE title ADD artist VARCHAR(255) NOT NULL, DROP artist_id');
    }
}
