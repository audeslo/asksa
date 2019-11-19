<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191119135151 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commandershow (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, commande_id INT DEFAULT NULL, capacitecartonshow INT NOT NULL, capacitebidonshow INT NOT NULL, quantitecommandeshow INT NOT NULL, quantitestock INT NOT NULL, etat SMALLINT NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME NOT NULL, created_on DATETIME NOT NULL, INDEX IDX_60333357DD7B2EBC (edited_by_id), INDEX IDX_60333357B03A8386 (created_by_id), INDEX IDX_60333357F347EFB (produit_id), INDEX IDX_6033335782EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_60333357DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_60333357B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_60333357F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_6033335782EA2E54 FOREIGN KEY (commande_id) REFERENCES commandeshow (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE commandershow');
    }
}
