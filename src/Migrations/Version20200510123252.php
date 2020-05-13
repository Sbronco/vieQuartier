<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200510123252 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE noter (id INT AUTO_INCREMENT NOT NULL, id_ville_id INT DEFAULT NULL, id_region_id INT DEFAULT NULL, id_user_id INT NOT NULL, note_tourisme INT DEFAULT NULL, note_transport INT DEFAULT NULL, note_loisir INT DEFAULT NULL, note_qualite_vie INT DEFAULT NULL, note_com_serv INT DEFAULT NULL, note_education INT DEFAULT NULL, note_service_publique INT DEFAULT NULL, note_population INT DEFAULT NULL, note_global INT DEFAULT NULL, INDEX IDX_761C961AF7E4ECA3 (id_ville_id), INDEX IDX_761C961A1813BD72 (id_region_id), INDEX IDX_761C961A79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE noter ADD CONSTRAINT FK_761C961AF7E4ECA3 FOREIGN KEY (id_ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE noter ADD CONSTRAINT FK_761C961A1813BD72 FOREIGN KEY (id_region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE noter ADD CONSTRAINT FK_761C961A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE noter');
    }
}
