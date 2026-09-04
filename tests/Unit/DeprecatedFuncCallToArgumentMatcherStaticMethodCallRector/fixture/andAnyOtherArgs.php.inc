<?php

declare(strict_types=1);

var_dump(andAnyOtherArgs());

var_dump(\andAnyOtherArgs());

?>
-----
<?php

declare(strict_types=1);

var_dump(\Mockery\ArgumentMatcher::andAnyOtherArgs());

var_dump(\Mockery\ArgumentMatcher::andAnyOtherArgs());

?>
