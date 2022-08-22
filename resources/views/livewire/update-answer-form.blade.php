<div id="multiple_radio_repeater">
    <div class="col-md-7">
        <div class="mb-10">
            <label for="content" class="required form-label">Pilihan jawaban & bobot nilai</label> <br>
            @foreach ($answers as $answer)
                @empty($answer['isNew'])
                    <input type="hidden" name="answers[{{ $loop->index }}][id]"
                        wire:model="answers.{{ $loop->index }}.id" />
                @endempty
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <div data-repeater-item class="form-group row align-items-center">
                            <div class="col-md-8">
                                <input type="text" name="answers[{{ $loop->index }}][answer]" class="form-control"
                                    wire:model="answers.{{ $loop->index }}.answer" />
                                <div class="d-md-none"></div>
                            </div>
                            <div class="col-md-3">
                                <input type="number" step="0.0001" pattern="^\d+(?:\.\d{1,2})?$" min="0"
                                    name="answers[{{ $loop->index }}][point]" class="form-control"
                                    wire:model="answers.{{ $loop->index }}.point" />
                                <div class="d-md-none"></div>
                            </div>
                            <div class="col-md-1">
                                @empty($answer['isNew'])
                                    <a href="javascript:;" wire:click.prevent="deleteConfirm({{ $loop->index }},false)"
                                        class="btn font-weight-bold btn-danger btn-icon">
                                        <i class="la la-trash-o"></i>
                                    </a>
                                @else
                                    <a href="javascript:;" wire:click.prevent="deleteConfirm({{ $loop->index }},true)"
                                        class="btn font-weight-bold btn-danger btn-icon">
                                        <i class="la la-trash-o"></i>
                                    </a>
                                @endempty
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-7 mb-10">
        <div class="btn font-weight-bold btn-primary" wire:click.prevent="addAnswer">
            <i class="la la-plus"></i>
            Tambah jawaban
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', () => {
            Livewire.on('swal', (message, type, index, isNew) => {
                Swal.fire({
                    icon: type,
                    text: message,
                    showCancelButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(isNew);
                        Livewire.emit('deleteAnswer', index, isNew)
                    }
                })
            })
        })
    </script>
</div>
