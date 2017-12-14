<?php

declare(strict_types=1);

namespace NullDev\Nemesis\SourceParser;

class ReflectionSourceParserContext extends SourceParserContext
{
    /** @When I parse it */
    public function iParseIt()
    {
        $this->sourceParser = new ReflectionSourceParser();

        eval($this->input);
        $this->result = $this->sourceParser->parse('<?php '.$this->input);
    }
}
