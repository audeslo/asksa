<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191121122758 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commandeclient (id INT AUTO_INCREMENT NOT NULL, clientcommande_id INT NOT NULL, produitclient_id INT NOT NULL, quantitecommande INT NOT NULL, referencecommande VARCHAR(255) NOT NULL, INDEX IDX_7414370A71F5E36D (clientcommande_id), INDEX IDX_7414370A1E341E52 (produitclient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT NOT NULL, created_by_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, datevente DATE NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME NOT NULL, created_on DATETIME NOT NULL, INDEX IDX_888A2A4CDD7B2EBC (edited_by_id), INDEX IDX_888A2A4CB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commandeclient ADD CONSTRAINT FK_7414370A71F5E36D FOREIGN KEY (clientcommande_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE commandeclient ADD CONSTRAINT FK_7414370A1E341E52 FOREIGN KEY (produitclient_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CDD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE commandeclient');
        $this->addSql('DROP TABLE vente');
    }
}
