<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191124161251 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sortie (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, edited_by_id INT DEFAULT NULL, produit_id INT NOT NULL, vente_id INT NOT NULL, quantitecarton INT NOT NULL, capacitebidon INT NOT NULL, quantiteachete INT NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME NOT NULL, created_on DATETIME NOT NULL, reference VARCHAR(255) NOT NULL, INDEX IDX_3C3FD3F2B03A8386 (created_by_id), INDEX IDX_3C3FD3F2DD7B2EBC (edited_by_id), INDEX IDX_3C3FD3F2F347EFB (produit_id), INDEX IDX_3C3FD3F27DC7170A (vente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, edited_by_id INT NOT NULL, created_by_id INT DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, datevente DATE NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME DEFAULT NULL, created_on DATETIME DEFAULT NULL, INDEX IDX_888A2A4C19EB6921 (client_id), INDEX IDX_888A2A4CDD7B2EBC (edited_by_id), INDEX IDX_888A2A4CB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F2B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F2DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F2F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F27DC7170A FOREIGN KEY (vente_id) REFERENCES vente (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CDD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandershow DROP FOREIGN KEY FK_6033335782EA2E54');
        $this->addSql('DROP INDEX IDX_6033335782EA2E54 ON commandershow');
        $this->addSql('ALTER TABLE commandershow CHANGE commande_id commandeshow_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_603333572BA6E032 FOREIGN KEY (commandeshow_id) REFERENCES commandeshow (id)');
        $this->addSql('CREATE INDEX IDX_603333572BA6E032 ON commandershow (commandeshow_id)');
        $this->addSql('ALTER TABLE commandeshow ADD showroom_id INT NOT NULL');
        $this->addSql('ALTER TABLE commandeshow ADD CONSTRAINT FK_7835D7AB2243B88B FOREIGN KEY (showroom_id) REFERENCES showroom (id)');
        $this->addSql('CREATE INDEX IDX_7835D7AB2243B88B ON commandeshow (showroom_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F27DC7170A');
        $this->addSql('DROP TABLE sortie');
        $this->addSql('DROP TABLE vente');
        $this->addSql('ALTER TABLE commandershow DROP FOREIGN KEY FK_603333572BA6E032');
        $this->addSql('DROP INDEX IDX_603333572BA6E032 ON commandershow');
        $this->addSql('ALTER TABLE commandershow CHANGE commandeshow_id commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_6033335782EA2E54 FOREIGN KEY (commande_id) REFERENCES commandeshow (id)');
        $this->addSql('CREATE INDEX IDX_6033335782EA2E54 ON commandershow (commande_id)');
        $this->addSql('ALTER TABLE commandeshow DROP FOREIGN KEY FK_7835D7AB2243B88B');
        $this->addSql('DROP INDEX IDX_7835D7AB2243B88B ON commandeshow');
        $this->addSql('ALTER TABLE commandeshow DROP showroom_id');
    }
}
