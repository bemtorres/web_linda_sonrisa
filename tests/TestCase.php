<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}

// select 'drop table ' || table_name || ';' from user_tables;
// select 'drop sequence ' || sequence_name || ';' from user_sequences;