<?php

use CodeIgniter\Test\CIUnitTestCase;
use Config\App;
use Config\Services;
use Tests\Support\Libraries\ConfigReader;

/**
 * @internal
 */
final class HealthTest extends CIUnitTestCase
{
    public function testIsDefinedAppPath(): void
    {
        $this->assertTrue(defined('APPPATH'));
    }

    public function testBaseUrlHasBeenSet(): void
    {
        $validation = Services::validation();

        // baseURL dibiarkan kosong di config = deteksi otomatis dari request.
        // Nilai efektif (setelah konstruktor App berjalan) harus selalu URL valid.
        $config = new App();
        $this->assertTrue(
            $validation->check($config->baseURL, 'valid_url'),
            'baseURL efektif "' . $config->baseURL . '" is not valid URL'
        );

        $env = false;

        // Check the baseURL in .env
        if (is_file(HOMEPATH . '.env')) {
            $env = preg_grep('/^app\.baseURL = ./', file(HOMEPATH . '.env')) !== false;
        }

        if ($env) {
            // BaseURL in .env is a valid URL?
            // phpunit.xml.dist sets app.baseURL in $_SERVER
            // So if you set app.baseURL in .env, it takes precedence
            $config = new App();
            $this->assertTrue(
                $validation->check($config->baseURL, 'valid_url'),
                'baseURL "' . $config->baseURL . '" in .env is not valid URL'
            );
        }

        // Nilai mentah baseURL di app/Config/App.php boleh kosong (auto-detect)
        // tetapi jika diisi harus berupa URL yang valid.
        $reader = new ConfigReader();

        if ($reader->baseURL !== '') {
            $this->assertTrue(
                $validation->check($reader->baseURL, 'valid_url'),
                'baseURL "' . $reader->baseURL . '" in app/Config/App.php is not valid URL'
            );
        }
    }
}
