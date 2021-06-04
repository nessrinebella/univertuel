<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210602120859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prophecy_caste (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE caste');
        $this->addSql('ALTER TABLE prophecy_sheet ADD caste_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prophecy_sheet ADD CONSTRAINT FK_A0ECCD529B1D13 FOREIGN KEY (caste_id) REFERENCES prophecy_caste (id)');
        $this->addSql('CREATE INDEX IDX_A0ECCD529B1D13 ON prophecy_sheet (caste_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prophecy_sheet DROP FOREIGN KEY FK_A0ECCD529B1D13');
        $this->addSql('CREATE TABLE caste (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE prophecy_caste');
        $this->addSql('DROP INDEX IDX_A0ECCD529B1D13 ON prophecy_sheet');
        $this->addSql('ALTER TABLE prophecy_sheet DROP caste_id');
    }
}
