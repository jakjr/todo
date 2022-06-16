import { reactive } from 'vue'

// by convention, composable function names start with "use"
export function useFilter(filters, action) {

    console.log(filters, action)

    let filter = reactive({
        filters: filters,
        reset() {
            filters.nameTerm = 'fffoo'
            console.log('aaaa')
            return this
        }
    });

    //watch

    return filter

    // state encapsulated and managed by the composable
    const x = ref(0)
    const y = ref(0)

    function refetchJoke() {
        //alert('joke')
        console.log(test.value)
        test.value.dataFilters.nameTerm = 'foi'
    }

    // expose managed state as return value
    return { x, y, refetchJoke }
}