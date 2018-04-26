{if: $paginator->hasPages()}
    <ul class="pagination">
        {if: $paginator->onFirstPage()}
            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
        {else}
            <li class="page-item"><a class="page-link" href="{$paginator->previousPageUrl()}" rel="prev">&laquo;</a></li>
        {/if}

        {foreach: $elements as $element}
            {if: is_string($element)}
                <li class="page-item disabled"><span class="page-link">{$element}</span></li>
            {/if}

            {if: is_array($element)}
                {foreach: $element as $page => $url}
                    {if: $page == $paginator->currentPage()}
                        <li class="page-item active"><span class="page-link">{$page}</span></li>
                    {else}
                        <li class="page-item"><a class="page-link" href="{$url}">{$page}</a></li>
                    {/if}
                {/foreach}
            {/if}
        {/foreach}

        {if: $paginator->hasMorePages()}
            <li class="page-item"><a class="page-link" href="{$paginator->nextPageUrl()}" rel="next">&raquo;</a></li>
        {else}
            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
        {/if}
    </ul>
{/if}
