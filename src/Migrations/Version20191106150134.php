<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191106150134 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, edited_by_id INT DEFAULT NULL, referent VARCHAR(255) NOT NULL, nomcomplet VARCHAR(255) NOT NULL, adresserue VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, codepostal VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, created_on DATETIME NOT NULL, edited_on DATETIME DEFAULT NULL, INDEX IDX_C7440455B03A8386 (created_by_id), INDEX IDX_C7440455DD7B2EBC (edited_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, edited_by_id INT DEFAULT NULL, nomcourt VARCHAR(255) NOT NULL, nomcomplet VARCHAR(255) NOT NULL, representant VARCHAR(255) NOT NULL, adresserue VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, codepostal VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, created_on DATETIME NOT NULL, edited_on DATETIME DEFAULT NULL, INDEX IDX_369ECA32B03A8386 (created_by_id), INDEX IDX_369ECA32DD7B2EBC (edited_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA32B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA32DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE fournisseur');
    }
}
