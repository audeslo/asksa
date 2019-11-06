<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191106104541 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fournisseur ADD created_by_id INT DEFAULT NULL, ADD edited_by_id INT DEFAULT NULL, ADD nomcomplet VARCHAR(255) NOT NULL, ADD representant VARCHAR(255) NOT NULL, ADD telephone VARCHAR(255) DEFAULT NULL, ADD description LONGTEXT DEFAULT NULL, ADD slug VARCHAR(255) NOT NULL, ADD created_on DATETIME NOT NULL, ADD edited_on DATETIME DEFAULT NULL, CHANGE adresserue adresserue VARCHAR(255) DEFAULT NULL, CHANGE ville ville VARCHAR(255) DEFAULT NULL, CHANGE pays pays VARCHAR(255) DEFAULT NULL, CHANGE codepostal codepostal VARCHAR(255) DEFAULT NULL, CHANGE mail mail VARCHAR(255) DEFAULT NULL, CHANGE societe nomcourt VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA32B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA32DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_369ECA32B03A8386 ON fournisseur (created_by_id)');
        $this->addSql('CREATE INDEX IDX_369ECA32DD7B2EBC ON fournisseur (edited_by_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA32B03A8386');
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA32DD7B2EBC');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_369ECA32B03A8386 ON fournisseur');
        $this->addSql('DROP INDEX IDX_369ECA32DD7B2EBC ON fournisseur');
        $this->addSql('ALTER TABLE fournisseur ADD societe VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP created_by_id, DROP edited_by_id, DROP nomcourt, DROP nomcomplet, DROP representant, DROP telephone, DROP description, DROP slug, DROP created_on, DROP edited_on, CHANGE adresserue adresserue VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pays pays VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE codepostal codepostal VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
