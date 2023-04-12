<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411121836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, vin VARCHAR(255) NOT NULL, make VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, release_date DATETIME NOT NULL, car_body VARCHAR(255) NOT NULL, engine VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_user (car_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_46F9C2E5C3C6F69F (car_id), INDEX IDX_46F9C2E5A76ED395 (user_id), PRIMARY KEY(car_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diagnosis (id INT AUTO_INCREMENT NOT NULL, repair_id INT DEFAULT NULL, result LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_7ED10F3D43833CFF (repair_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diagnosis_tag (diagnosis_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_6861615D3CBE4D00 (diagnosis_id), INDEX IDX_6861615DBAD26311 (tag_id), PRIMARY KEY(diagnosis_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engine (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, capacity VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engine_model (engine_id INT NOT NULL, model_id INT NOT NULL, INDEX IDX_FAFDA692E78C9C0A (engine_id), INDEX IDX_FAFDA6927975B7E7 (model_id), PRIMARY KEY(engine_id, model_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE make (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, make_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D79572D9CFBF73EB (make_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair (id INT AUTO_INCREMENT NOT NULL, car VARCHAR(255) NOT NULL, date DATETIME NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, reason LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE result (id INT AUTO_INCREMENT NOT NULL, repair_id INT DEFAULT NULL, description LONGTEXT NOT NULL, photos VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_136AC11343833CFF (repair_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE result_tag (result_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_878F688C7A7B643 (result_id), INDEX IDX_878F688CBAD26311 (tag_id), PRIMARY KEY(result_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_shop (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, nip VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_55A9FD9AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_user ADD CONSTRAINT FK_46F9C2E5C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_user ADD CONSTRAINT FK_46F9C2E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE diagnosis ADD CONSTRAINT FK_7ED10F3D43833CFF FOREIGN KEY (repair_id) REFERENCES repair (id)');
        $this->addSql('ALTER TABLE diagnosis_tag ADD CONSTRAINT FK_6861615D3CBE4D00 FOREIGN KEY (diagnosis_id) REFERENCES diagnosis (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE diagnosis_tag ADD CONSTRAINT FK_6861615DBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE engine_model ADD CONSTRAINT FK_FAFDA692E78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE engine_model ADD CONSTRAINT FK_FAFDA6927975B7E7 FOREIGN KEY (model_id) REFERENCES model (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9CFBF73EB FOREIGN KEY (make_id) REFERENCES make (id)');
        $this->addSql('ALTER TABLE result ADD CONSTRAINT FK_136AC11343833CFF FOREIGN KEY (repair_id) REFERENCES repair (id)');
        $this->addSql('ALTER TABLE result_tag ADD CONSTRAINT FK_878F688C7A7B643 FOREIGN KEY (result_id) REFERENCES result (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE result_tag ADD CONSTRAINT FK_878F688CBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE work_shop ADD CONSTRAINT FK_55A9FD9AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_user DROP FOREIGN KEY FK_46F9C2E5C3C6F69F');
        $this->addSql('ALTER TABLE car_user DROP FOREIGN KEY FK_46F9C2E5A76ED395');
        $this->addSql('ALTER TABLE diagnosis DROP FOREIGN KEY FK_7ED10F3D43833CFF');
        $this->addSql('ALTER TABLE diagnosis_tag DROP FOREIGN KEY FK_6861615D3CBE4D00');
        $this->addSql('ALTER TABLE diagnosis_tag DROP FOREIGN KEY FK_6861615DBAD26311');
        $this->addSql('ALTER TABLE engine_model DROP FOREIGN KEY FK_FAFDA692E78C9C0A');
        $this->addSql('ALTER TABLE engine_model DROP FOREIGN KEY FK_FAFDA6927975B7E7');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9CFBF73EB');
        $this->addSql('ALTER TABLE result DROP FOREIGN KEY FK_136AC11343833CFF');
        $this->addSql('ALTER TABLE result_tag DROP FOREIGN KEY FK_878F688C7A7B643');
        $this->addSql('ALTER TABLE result_tag DROP FOREIGN KEY FK_878F688CBAD26311');
        $this->addSql('ALTER TABLE work_shop DROP FOREIGN KEY FK_55A9FD9AA76ED395');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_user');
        $this->addSql('DROP TABLE diagnosis');
        $this->addSql('DROP TABLE diagnosis_tag');
        $this->addSql('DROP TABLE engine');
        $this->addSql('DROP TABLE engine_model');
        $this->addSql('DROP TABLE make');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE repair');
        $this->addSql('DROP TABLE result');
        $this->addSql('DROP TABLE result_tag');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE work_shop');
    }
}
