<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191213162840 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tarifcategorieclt (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, produit_id INT NOT NULL, created_by_id INT DEFAULT NULL, edited_by_id INT DEFAULT NULL, montant INT DEFAULT NULL, bornesupperieur INT DEFAULT NULL, observation LONGTEXT DEFAULT NULL, borneinferieure INT DEFAULT NULL, litre VARCHAR(255) NOT NULL, created_on DATETIME NOT NULL, edited_on DATETIME DEFAULT NULL, INDEX IDX_E1ACC357BCF5E72D (categorie_id), INDEX IDX_E1ACC357F347EFB (produit_id), INDEX IDX_E1ACC357B03A8386 (created_by_id), INDEX IDX_E1ACC357DD7B2EBC (edited_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tarifcategorieclt ADD CONSTRAINT FK_E1ACC357BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE tarifcategorieclt ADD CONSTRAINT FK_E1ACC357F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE tarifcategorieclt ADD CONSTRAINT FK_E1ACC357B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tarifcategorieclt ADD CONSTRAINT FK_E1ACC357DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD showroom_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492243B88B FOREIGN KEY (showroom_id) REFERENCES showroom (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492243B88B ON user (showroom_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tarifcategorieclt');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492243B88B');
        $this->addSql('DROP INDEX IDX_8D93D6492243B88B ON user');
        $this->addSql('ALTER TABLE user DROP showroom_id');
    }
}
