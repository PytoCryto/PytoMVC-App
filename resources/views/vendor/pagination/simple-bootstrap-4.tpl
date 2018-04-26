{if: $paginator->hasPages())
    <ul class="pagination">
        {if: $paginator->onFirstPage()}
            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
        {else}
            <li class="page-item"><a class="page-link" href="{$paginator->previousPageUrl()}" rel="prev">&laquo;</a></li>
        {/if}

        {if: $paginator->hasMorePages()}
            <li class="page-item"><a class="page-link" href="{$paginator->nextPageUrl()}" rel="next">&raquo;</a></li>
        {else}
            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
        {/if}
    </ul>
{/if}
