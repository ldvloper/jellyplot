<x-invoice-layout>
    <livewire:app.invoices.custom-invoice/>
<script src="{{asset('js/pikaday.js')}}" defer></script>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        const today = new Date();
    });

    function invoices() {
        return {
            items: [],
            invoiceNumber: 0,
            invoiceDate: '{{date('jS \of F Y')}}',
            invoiceDueDate: '',

            totalGST: 0,
            netTotal: 0,

            item: {
                id: '',
                name: '',
                qty: 0,
                rate: 0,
                total: 0,
                gst: 18
            },

            billing: {
                name: '',
                address: '',
                extra: ''
            },
            from: {
                name: '',
                address: '',
                extra: ''
            },

            showTooltip: false,
            showTooltip2: false,
            openModal: false,

            addItem() {
                this.items.push({
                    id: this.generateUUID(),
                    name: this.item.name,
                    qty: this.item.qty,
                    rate: this.item.rate,
                    gst: this.calculateGST(this.item.gst, this.item.rate),
                    total: this.item.qty * this.item.rate
                })

                this.itemTotal();
                this.itemTotalGST();

                this.item.id = '';
                this.item.name = '';
                this.item.qty = 0;
                this.item.rate = 0;
                this.item.gst = 18;
                this.item.total = 0;
            },

            deleteItem(uuid) {
                this.items = this.items.filter(item => uuid !== item.id);

                this.itemTotal();
                this.itemTotalGST();
            },

            itemTotal() {
                this.netTotal = this.numberFormat(this.items.length > 0 ? this.items.reduce((result, item) => {
                    return result + item.total;
                }, 0) : 0);
            },

            itemTotalGST() {
                this.totalGST =  this.numberFormat(this.items.length > 0 ? this.items.reduce((result, item) => {
                    return result + (item.gst * item.qty);
                }, 0) : 0);
            },

            calculateGST(GSTPercentage, itemRate) {
                return this.numberFormat((itemRate - (itemRate * (100 / (100 + GSTPercentage)))).toFixed(2));
            },

            generateUUID() {
                return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                    var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
                    return v.toString(16);
                });
            },

            generateInvoiceNumber(minimum, maximum) {
                const randomNumber = Math.floor(Math.random() * (maximum - minimum)) + minimum;
                this.invoiceNumber = '#INV-'+ randomNumber;
            },

            numberFormat(amount) {
                return amount.toLocaleString("en-US", {
                    style: "currency",
                    currency: "INR"
                });
            },

            printInvoice() {
                var printContents = this.$refs.printTemplate.innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        }
    }
</script>
</x-invoice-layout>
