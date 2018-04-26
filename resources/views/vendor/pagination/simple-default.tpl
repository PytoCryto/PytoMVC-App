{if: $paginator->hasPages())
    <ul class="pagination">
        {if: $paginator->onFirstPage()}
            <li class="disabled"><span>&laquo;</span></li>
        {else}
            <li><a href="{$paginator->previousPageUrl()}" rel="prev">&laquo;</a></li>
        {/if}

        {if: $paginator->hasMorePages()}
            <li><a href="{$paginator->nextPageUrl()}" rel="next">&raquo;</a></li>
        {else}
            <li class="disabled"><span>&raquo;</span></li>
        {/if}
    </ul>
{/if}
