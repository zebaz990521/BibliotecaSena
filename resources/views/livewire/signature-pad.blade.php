<div>
    <div wire:ignore>
        <canvas id="signature-pad" width="400" height="200" class="border border-gray-300"></canvas>
        <button type="button" onclick="clearPad()" class="mt-2 px-3 py-1 bg-red-500  text-black dark:text-white rounded">Limpiar</button>
    </div>

    <input type="hidden" wire:model="signature" id="signature">





</div>

 <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.5/dist/signature_pad.umd.min.js"></script>
<script>


    let canvas = document.getElementById('signature-pad');
    let signaturePad = new SignaturePad(canvas);

    function clearPad() {
        signaturePad.clear();
        document.getElementById('signature').value = '';
        Livewire.dispatch('input', { id: 'signature', value: '' });
    }

    canvas.addEventListener('mouseup', () => {
        let dataUrl = signaturePad.toDataURL();
        document.getElementById('signature').value = dataUrl;
        Livewire.dispatch('input', { id: 'signature', value: dataUrl });
    });

     document.addEventListener('livewire:load', () => {
            const canvas = document.getElementById('signatureCanvas');
            const signaturePad = new SignaturePad(canvas);

            signaturePad.onEnd = () => {
                const data = signaturePad.toDataURL('image/png');
                @this.signature = data;
            };

            // Escuchar para limpiar el canvas
            Livewire.on('clear-canvas', () => {
                signaturePad.clear();
                @this.signature = null;
            });
        });

    Livewire.on('clear-canvas', () => {
        clearPad();
    });
</script>

