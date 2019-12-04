<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191204204644 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE venteshowroom (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, produit_id INT NOT NULL, client_id INT NOT NULL, stockshowroom_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, datevente DATE NOT NULL, quantitecarton INT NOT NULL, capacitebidon INT NOT NULL, quantiteachete INT NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME DEFAULT NULL, created_on DATETIME NOT NULL, payer SMALLINT DEFAULT NULL, grosdetail VARCHAR(255) NOT NULL, modereglement VARCHAR(255) NOT NULL, INDEX IDX_356D39D2DD7B2EBC (edited_by_id), INDEX IDX_356D39D2B03A8386 (created_by_id), INDEX IDX_356D39D2F347EFB (produit_id), INDEX IDX_356D39D219EB6921 (client_id), INDEX IDX_356D39D2EF41BF5F (stockshowroom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D2DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D2B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D2F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D219EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D2EF41BF5F FOREIGN KEY (stockshowroom_id) REFERENCES stockshowroom (id)');
        $this->addSql('ALTER TABLE commandeshow CHANGE credited_on credited_on DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE venteshowroom');
        $this->addSql('ALTER TABLE commandeshow CHANGE credited_on credited_on DATETIME DEFAULT NULL');
    }
}
