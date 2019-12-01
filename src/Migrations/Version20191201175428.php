<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191201175428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F27DC7170A');
        $this->addSql('CREATE TABLE modereglement (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME NOT NULL, created_on DATETIME NOT NULL, INDEX IDX_C643F0B7DD7B2EBC (edited_by_id), INDEX IDX_C643F0B7B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE venteshowroom (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, produit_id INT NOT NULL, client_id INT NOT NULL, stockshowroom_id INT DEFAULT NULL, modereglement_id INT NOT NULL, reference VARCHAR(255) NOT NULL, datevente DATE NOT NULL, quantitecarton INT NOT NULL, capacitebidon INT NOT NULL, quantiteachete INT NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME DEFAULT NULL, created_on DATETIME NOT NULL, payer SMALLINT DEFAULT NULL, grosdetail VARCHAR(255) NOT NULL, INDEX IDX_356D39D2DD7B2EBC (edited_by_id), INDEX IDX_356D39D2B03A8386 (created_by_id), INDEX IDX_356D39D2F347EFB (produit_id), INDEX IDX_356D39D219EB6921 (client_id), INDEX IDX_356D39D2EF41BF5F (stockshowroom_id), INDEX IDX_356D39D25D39DCF4 (modereglement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE modereglement ADD CONSTRAINT FK_C643F0B7DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE modereglement ADD CONSTRAINT FK_C643F0B7B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D2DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D2B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D2F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D219EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D2EF41BF5F FOREIGN KEY (stockshowroom_id) REFERENCES stockshowroom (id)');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D25D39DCF4 FOREIGN KEY (modereglement_id) REFERENCES modereglement (id)');
        $this->addSql('DROP TABLE sortie');
        $this->addSql('DROP TABLE vente');
        $this->addSql('ALTER TABLE user ADD created_by_id INT DEFAULT NULL, ADD edited_by_id INT DEFAULT NULL, ADD sexe VARCHAR(1) DEFAULT NULL, ADD username VARCHAR(255) NOT NULL, ADD username_canonical VARCHAR(255) DEFAULT NULL, ADD email VARCHAR(255) NOT NULL, ADD email_canonical VARCHAR(255) DEFAULT NULL, ADD enabled TINYINT(1) DEFAULT NULL, ADD salt VARCHAR(255) DEFAULT NULL, ADD password VARCHAR(255) NOT NULL, ADD plain_password VARCHAR(255) DEFAULT NULL, ADD last_login DATETIME DEFAULT NULL, ADD confirmation_token VARCHAR(255) DEFAULT NULL, ADD password_requested_at DATETIME DEFAULT NULL, ADD groups LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD created_on DATETIME NOT NULL, ADD edited_on DATETIME DEFAULT NULL, DROP mail, DROP mdp, DROP mdpconfirm, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649B03A8386 ON user (created_by_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649DD7B2EBC ON user (edited_by_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE venteshowroom DROP FOREIGN KEY FK_356D39D25D39DCF4');
        $this->addSql('CREATE TABLE sortie (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, edited_by_id INT DEFAULT NULL, produit_id INT NOT NULL, vente_id INT NOT NULL, quantitecarton INT NOT NULL, capacitebidon INT NOT NULL, quantiteachete INT NOT NULL, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, edited_on DATETIME NOT NULL, created_on DATETIME NOT NULL, reference VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_3C3FD3F2DD7B2EBC (edited_by_id), INDEX IDX_3C3FD3F27DC7170A (vente_id), INDEX IDX_3C3FD3F2B03A8386 (created_by_id), INDEX IDX_3C3FD3F2F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vente (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, edited_by_id INT NOT NULL, created_by_id INT DEFAULT NULL, reference VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, datevente DATE NOT NULL, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, edited_on DATETIME DEFAULT NULL, created_on DATETIME DEFAULT NULL, INDEX IDX_888A2A4CDD7B2EBC (edited_by_id), INDEX IDX_888A2A4C19EB6921 (client_id), INDEX IDX_888A2A4CB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F27DC7170A FOREIGN KEY (vente_id) REFERENCES vente (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F2B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F2DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F2F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CDD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE modereglement');
        $this->addSql('DROP TABLE venteshowroom');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B03A8386');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649DD7B2EBC');
        $this->addSql('DROP INDEX IDX_8D93D649B03A8386 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649DD7B2EBC ON user');
        $this->addSql('ALTER TABLE user ADD mail VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD mdp VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD mdpconfirm VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP created_by_id, DROP edited_by_id, DROP sexe, DROP username, DROP username_canonical, DROP email, DROP email_canonical, DROP enabled, DROP salt, DROP password, DROP plain_password, DROP last_login, DROP confirmation_token, DROP password_requested_at, DROP groups, DROP roles, DROP created_on, DROP edited_on, CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
