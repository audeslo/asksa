<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191208171957 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE vente_stock (id INT AUTO_INCREMENT NOT NULL, venteshowroom_id INT NOT NULL, produit_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, contenant VARCHAR(255) NOT NULL, quantite INT NOT NULL, bidon INT NOT NULL, carton INT NOT NULL, created_on DATETIME NOT NULL, INDEX IDX_5F275B29D5CBB404 (venteshowroom_id), INDEX IDX_5F275B29F347EFB (produit_id), INDEX IDX_5F275B29B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vente_stock ADD CONSTRAINT FK_5F275B29D5CBB404 FOREIGN KEY (venteshowroom_id) REFERENCES venteshowroom (id)');
        $this->addSql('ALTER TABLE vente_stock ADD CONSTRAINT FK_5F275B29F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE vente_stock ADD CONSTRAINT FK_5F275B29B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE venteshowroom DROP FOREIGN KEY FK_356D39D2EF41BF5F');
        $this->addSql('DROP INDEX IDX_356D39D2EF41BF5F ON venteshowroom');
        $this->addSql('ALTER TABLE venteshowroom DROP stockshowroom_id, CHANGE reference reference VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE stockshowroom ADD sync TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE vente_stock');
        $this->addSql('ALTER TABLE stockshowroom DROP sync');
        $this->addSql('ALTER TABLE venteshowroom ADD stockshowroom_id INT DEFAULT NULL, CHANGE reference reference VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D2EF41BF5F FOREIGN KEY (stockshowroom_id) REFERENCES stockshowroom (id)');
        $this->addSql('CREATE INDEX IDX_356D39D2EF41BF5F ON venteshowroom (stockshowroom_id)');
    }
}
