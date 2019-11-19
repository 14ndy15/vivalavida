<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191119192158 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE image_file (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, category VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, text_en LONGTEXT DEFAULT NULL, text_de LONGTEXT DEFAULT NULL, text_es LONGTEXT DEFAULT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_image_file (room_id INT NOT NULL, image_file_id INT NOT NULL, INDEX IDX_4A57AC9254177093 (room_id), INDEX IDX_4A57AC926DB2EB0 (image_file_id), PRIMARY KEY(room_id, image_file_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE room_image_file ADD CONSTRAINT FK_4A57AC9254177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room_image_file ADD CONSTRAINT FK_4A57AC926DB2EB0 FOREIGN KEY (image_file_id) REFERENCES image_file (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE room_image_file DROP FOREIGN KEY FK_4A57AC926DB2EB0');
        $this->addSql('ALTER TABLE room_image_file DROP FOREIGN KEY FK_4A57AC9254177093');
        $this->addSql('DROP TABLE image_file');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE room_image_file');
    }
}
