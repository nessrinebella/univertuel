<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210602100210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prophecy_age_caracteristic (id INT AUTO_INCREMENT NOT NULL, age_id INT DEFAULT NULL, caracteristic_id INT DEFAULT NULL, modification INT NOT NULL, INDEX IDX_4554A372CC80CD12 (age_id), INDEX IDX_4554A37281194CF4 (caracteristic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prophecy_age_caracteristic ADD CONSTRAINT FK_4554A372CC80CD12 FOREIGN KEY (age_id) REFERENCES prophecy_age (id)');
        $this->addSql('ALTER TABLE prophecy_age_caracteristic ADD CONSTRAINT FK_4554A37281194CF4 FOREIGN KEY (caracteristic_id) REFERENCES prophecy_caracteristic (id)');
        $this->addSql('DROP TABLE age_caracteristic');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE age_caracteristic (id INT AUTO_INCREMENT NOT NULL, age_id INT DEFAULT NULL, caracteristic_id INT DEFAULT NULL, modification INT NOT NULL, INDEX IDX_6DD359C781194CF4 (caracteristic_id), INDEX IDX_6DD359C7CC80CD12 (age_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE age_caracteristic ADD CONSTRAINT FK_6DD359C781194CF4 FOREIGN KEY (caracteristic_id) REFERENCES prophecy_caracteristic (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE age_caracteristic ADD CONSTRAINT FK_6DD359C7CC80CD12 FOREIGN KEY (age_id) REFERENCES prophecy_age (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE prophecy_age_caracteristic');
    }
}
