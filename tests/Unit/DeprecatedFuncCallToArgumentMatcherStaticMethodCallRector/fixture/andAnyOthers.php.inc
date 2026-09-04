<?php

declare(strict_types=1);

var_dump(andAnyOthers());

var_dump(\andAnyOthers());

?>
-----
<?php

declare(strict_types=1);

var_dump(\Mockery\ArgumentMatcher::andAnyOthers());

var_dump(\Mockery\ArgumentMatcher::andAnyOthers());

?>
