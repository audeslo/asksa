<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191129163456 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vente ADD produit_id INT NOT NULL, ADD stockshowroom_id INT DEFAULT NULL, ADD quantiteachetee INT NOT NULL, ADD capacitecartonvente INT NOT NULL, ADD capacitebidonvente INT NOT NULL, CHANGE edited_by_id edited_by_id INT NOT NULL');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CEF41BF5F FOREIGN KEY (stockshowroom_id) REFERENCES stockshowroom (id)');
        $this->addSql('CREATE INDEX IDX_888A2A4CF347EFB ON vente (produit_id)');
        $this->addSql('CREATE INDEX IDX_888A2A4CEF41BF5F ON vente (stockshowroom_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4CF347EFB');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4CEF41BF5F');
        $this->addSql('DROP INDEX IDX_888A2A4CF347EFB ON vente');
        $this->addSql('DROP INDEX IDX_888A2A4CEF41BF5F ON vente');
        $this->addSql('ALTER TABLE vente DROP produit_id, DROP stockshowroom_id, DROP quantiteachetee, DROP capacitecartonvente, DROP capacitebidonvente, CHANGE edited_by_id edited_by_id INT DEFAULT NULL');
    }
}
