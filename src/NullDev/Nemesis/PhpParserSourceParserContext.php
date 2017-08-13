<?php

declare(strict_types=1);

namespace NullDev\Nemesis;

class PhpParserSourceParserContext extends SourceParserContext
{
    /** @When I parse it */
    public function iParseIt()
    {
        $this->sourceParser = new PhpParserSourceParser();

        $this->result = $this->sourceParser->parse('<?php '.$this->input);
    }
}
