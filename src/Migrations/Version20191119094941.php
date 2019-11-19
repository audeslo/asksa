<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191119094941 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commandeshow (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, intituleshow VARCHAR(255) NOT NULL, datecomshow DATE NOT NULL, reference VARCHAR(255) NOT NULL, fournisseurshow VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME NOT NULL, credited_on DATETIME NOT NULL, INDEX IDX_7835D7ABDD7B2EBC (edited_by_id), INDEX IDX_7835D7ABB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commandeshow ADD CONSTRAINT FK_7835D7ABDD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandeshow ADD CONSTRAINT FK_7835D7ABB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE commandeshow');
    }
}
