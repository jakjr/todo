import { Inertia } from "@inertiajs/inertia";
import { onBeforeUnmount, onMounted } from "vue";

export function usePersistScroll() {

    onMounted(function () {
        scroll = sessionStorage.getItem(`scroll.${Inertia.page.component}`)
        if (scroll) {
            //Acredito que o Inertia tenta sempre colocar o scroll para Zero e, as vezes, existe uma race condition;
            setTimeout(() => {
                window.scrollTo({
                    top: scroll,
                    left: 0,
                    behavior: 'instant'
                })
                //console.log(`Restore ${scroll}`)
            }, 10)
        }
    })

    onBeforeUnmount(
        Inertia.on('start', (event) => {
            sessionStorage.setItem(`scroll.${Inertia.page.component}`, window.scrollY)
            //console.log(`Store ${window.scrollY}`)
        })
    )

}