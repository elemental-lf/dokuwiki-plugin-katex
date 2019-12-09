<?php

class action_plugin_KaTeX_KaTeX extends DokuWiki_Action_Plugin
{
    const KATEX_VERSION = '0.11.1';

    /**
     * Registers a callback function for a given event
     *
     * @param Doku_Event_Handler $controller DokuWiki's event controller object
     *
     * @return void
     */
    public function register(Doku_Event_Handler $controller)
    {
        $controller->register_hook(
            'TPL_METAHEADER_OUTPUT',
            'BEFORE',
            $this,
            'includeKaTex'
        );
    }

    /**
     * Event: TPL_METAHEADER_OUTPUT
     *
     * @param Doku_Event $event event object by reference
     *
     * @return void
     */
    public function includeKaTex(Doku_Event $event)
    {
        $event->data['script'][] = [
            'type' => 'text/javascript',
            'src' => 'https://cdn.jsdelivr.net/npm/katex@' . self::KATEX_VERSION . '/dist/katex.js',
            'defer' => true,
            'crossorigin' => 'anonymous',
        ];
        $event->data['script'][] = [
            'type' => 'text/javascript',
            'src' => 'https://cdn.jsdelivr.net/npm/katex@' . self::KATEX_VERSION . '/dist/contrib/mhchem.min.js',
            'defer' => true,
            'crossorigin' => 'anonymous',
        ];
        $event->data['script'][] = [
            'type' => 'text/javascript',
            'src' => 'https://cdn.jsdelivr.net/npm/katex@' . self::KATEX_VERSION . '/dist/contrib/auto-render.min.js',
            'defer' => true,
            'crossorigin' => 'anonymous',
        ];

        $event->data['link'][] = [
            'rel' => 'stylesheet',
            'type' => 'text/css',
            'href' => 'https://cdn.jsdelivr.net/npm/katex@' . self::KATEX_VERSION . '/dist/katex.css',
            'crossorigin' => 'anonymous',
        ];
    }
}
