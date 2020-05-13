<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200510122311 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE noter (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, note_tourisme INT DEFAULT NULL, note_transport INT DEFAULT NULL, note_loisir INT DEFAULT NULL, note_qualite_vie INT DEFAULT NULL, note_com_serv INT DEFAULT NULL, note_education INT DEFAULT NULL, note_service_publique INT DEFAULT NULL, note_population INT DEFAULT NULL, note_global INT DEFAULT NULL, INDEX IDX_761C961A79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom_pays VARCHAR(255) NOT NULL, id_pays INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, id_pays_id INT NOT NULL, nom_region VARCHAR(255) NOT NULL, INDEX IDX_F62F1767879EB34 (id_pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, adress_ip VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, id_region_id INT NOT NULL, nom_ville VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C31813BD72 (id_region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE noter ADD CONSTRAINT FK_761C961A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F1767879EB34 FOREIGN KEY (id_pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C31813BD72 FOREIGN KEY (id_region_id) REFERENCES region (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F1767879EB34');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C31813BD72');
        $this->addSql('ALTER TABLE noter DROP FOREIGN KEY FK_761C961A79F37AE5');
        $this->addSql('DROP TABLE noter');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE ville');
    }
}
