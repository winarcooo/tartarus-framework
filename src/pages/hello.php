<?php
//tartarus/hello.php

$input = $request->get('name','world');

$response->setContent(sprintf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8')));