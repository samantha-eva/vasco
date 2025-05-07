<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250507140457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE investment (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, operation_id INT DEFAULT NULL, montant NUMERIC(10, 2) NOT NULL, date DATE NOT NULL, INDEX IDX_43CA0AD6A76ED395 (user_id), INDEX IDX_43CA0AD644AC3583 (operation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE investment ADD CONSTRAINT FK_43CA0AD6A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE investment ADD CONSTRAINT FK_43CA0AD644AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE investment DROP FOREIGN KEY FK_43CA0AD6A76ED395');
        $this->addSql('ALTER TABLE investment DROP FOREIGN KEY FK_43CA0AD644AC3583');
        $this->addSql('DROP TABLE investment');
        $this->addSql('DROP TABLE operation');
    }
}
