<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210601194541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE age_caracteristic ADD age_id INT DEFAULT NULL, ADD caracteristic_id INT DEFAULT NULL, DROP age, DROP caracteristic');
        $this->addSql('ALTER TABLE age_caracteristic ADD CONSTRAINT FK_6DD359C7CC80CD12 FOREIGN KEY (age_id) REFERENCES prophecy_age (id)');
        $this->addSql('ALTER TABLE age_caracteristic ADD CONSTRAINT FK_6DD359C781194CF4 FOREIGN KEY (caracteristic_id) REFERENCES prophecy_caracteristic (id)');
        $this->addSql('CREATE INDEX IDX_6DD359C7CC80CD12 ON age_caracteristic (age_id)');
        $this->addSql('CREATE INDEX IDX_6DD359C781194CF4 ON age_caracteristic (caracteristic_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE age_caracteristic DROP FOREIGN KEY FK_6DD359C7CC80CD12');
        $this->addSql('ALTER TABLE age_caracteristic DROP FOREIGN KEY FK_6DD359C781194CF4');
        $this->addSql('DROP INDEX IDX_6DD359C7CC80CD12 ON age_caracteristic');
        $this->addSql('DROP INDEX IDX_6DD359C781194CF4 ON age_caracteristic');
        $this->addSql('ALTER TABLE age_caracteristic ADD age INT NOT NULL, ADD caracteristic INT NOT NULL, DROP age_id, DROP caracteristic_id');
    }
}
