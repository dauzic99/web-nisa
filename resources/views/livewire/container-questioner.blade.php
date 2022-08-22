<div>
    @if ($completeForm)
        <div class="text-center">
            <h3 class="text-uppercase mt-0 line-height-1">Terimakasih atas jawaban anda<br></h3>
        </div>
    @else
        @if ($identity)
            <h3>Identitas Responden</h3>

            <div class="form-group">
                <label>Umur</label>
                <select class="form-select" wire:model="fraction">
                    <option value='Fraksi Golkar'>Fraksi Golkar</option>
                    <option value='Fraksi PDI-P'>Fraksi PDI-P</option>
                    <option value='Fraksi Gerindra'>Fraksi Gerindra</option>
                    <option value='Fraksi PKB-Hanura'>Fraksi PKB-Hanura</option>
                    <option value='Fraksi PAN'>Fraksi PAN</option>
                    <option value='Fraksi PPP'>Fraksi PPP</option>
                    <option value='Fraksi PKS'>Fraksi PKS</option>
                    <option value='Fraksi Demokrat-Nasdem'>Fraksi Demokrat-Nasdem</option>
                </select>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-select" wire:model="gender">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            @if ($errors->has('identity'))
                <div class="text-danger">{{ $errors->first('identity') }}</div>
            @endif
        @endif
        @if ($questionDisplay)
            {{-- @foreach ($forms as $iForm => $form) --}}
            <h3>Unsur Pelayanan {{ $services[$currentIndexService]->name }} </h3>
            <h4>Pelayanan {{ $currentIndexService + 1 }} dari {{ count($services) }}</h4>
            <div class="line"></div>
            @forelse ($forms[$currentIndexService] as $questionIndex => $question)
                <p class="">{{ $question['content'] }}</p>
                @foreach ($question['answer'] as $index => $answer)
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                            name="answer[{{ $currentIndexService }}][{{ $questionIndex }}][responses]"
                            wire:model="forms.{{ $currentIndexService }}.{{ $questionIndex }}.responses"
                            id="{{ $answer['id'] }}" value="{{ $answer['id'] }}">
                        <label class="form-check-label" for="{{ $answer['id'] }}">
                            {{ $answer['answer'] }}
                        </label>
                    </div>
                @endforeach
                @if ($errors->has("answer[$currentIndexService][$questionIndex][responses]"))
                    <div class="text-danger">
                        {{ $errors->first("answer[$currentIndexService][$questionIndex][responses]") }}</div>
                @endif
                <div class="line"></div>
            @empty
                <h4>Tidak ada pertanyaan silahkan lanjut</h4>
            @endforelse
            {{-- @endforeach --}}
        @endif

        @if ($suggestion)
            <h4>Saran dan Masukan</h4>
            <hr>
            <div class="form-group">

                <textarea wire:model="suggestion_content" class="form-control" cols="30" rows="10"></textarea>

            </div>
            @if ($errors->has('suggestion'))
                <div class="text-danger">{{ $errors->first('suggestion') }}</div>
            @endif
        @endif

    @endif

    @if ($beforeButton)
        <a class="button button-rounded button-reveal button-large button-border" href="#" style="float: left;"
            wire:click.prevent="beforeForm">
            <i class="icon-line-arrow-left"></i>
            <span>Previous</span>
        </a>
    @endif
    @if ($nextButton)
        <a class="button button-rounded button-reveal button-large button-border text-end" href="#"
            style="float: right;" wire:click.prevent="nextForm">
            <i class="icon-line-arrow-right"></i>
            <span>Next</span>

        </a>
    @endif
    @if ($sendButton)
        <a class="button button-rounded button-reveal button-large button-border text-end" href="#"
            style="float: right;" wire:click.prevent="saveForm">
            <i class="icon-line-arrow-right"></i>
            <span>Kirim</span>
        </a>
    @endif
</div>
