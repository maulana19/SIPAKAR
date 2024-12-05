
<section class="col-lg-12">
    <form wire:submit.prevent='simpanPenugasan'>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">
                    {{-- <i class="fa fa-tags"></i> --}}
                    Pilih Sektor yang akan mengerjakan {{ $dataBatch->nama_batch }} !
                </h3>
                <div class="card-tools">
                    <button type="submit" class="btn btn-success" id="button-addon2"><span
                            class="fa fa-save"></span> Simpan Penugasan</button>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <select wire:model='area' id="" class="form-control">
                                <option value="" selected hidden>Pilih Area Yang Akan Mengerjakan Batch Tersebut</option>
                                <option value="Sawmill">Sawmill</option>
                                <option value="Roughmill">Roughmill</option>
                                <option value="Milling">Milling</option>
                                <option value="Assembling">Assembling</option>
                                <option value="Finishing">Finishing</option>
                                <option value="Packing">Packing</option>
                                <option value="Pola">Pola</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="button" wire:click.prevent='simpanArea' class="btn btn-outline-primary">Tambah Penugasan</button>
                        </div>
                        <div class="col-md-12 mt-4">
                            <b>Area Pengerjaan Batch Terpilih</b>
                        </div>
                        <div class="col-md-12 mt-1">
                            <div style="display: flex;gap: 10px">
                                @if ($penugasan != null)
                                    @foreach ($penugasan as $area)
                                        @switch($area)
                                            @case("Sawmill")
                                                <button class="btn btn-primary" type="button" wire:click.prevent='hapusarea("{{ Crypt::encrypt($area) }}")'><b>Sawmill</b></button>
                                                @break
                                            @case("Roughmill")
                                                <button class="btn btn-primary" type="button" wire:click='hapusarea("{{ Crypt::encrypt($area) }}")'><b>Roughmill</b></button>
                                                @break
                                            @case("Milling")
                                                <button class="btn btn-primary" type="button" wire:click='hapusarea("{{ Crypt::encrypt($area) }}")'><b>Milling</b></button>
                                                @break
                                            @case("Assembling")
                                                <button class="btn btn-primary" type="button" wire:click='hapusarea("{{ Crypt::encrypt($area) }}")'><b>Assembling</b></button>
                                                @break
                                            @case("Finishing")
                                                <button class="btn btn-primary" type="button" wire:click='hapusarea("{{ Crypt::encrypt($area) }}")'><b>Finishing</b></button>
                                                @break
                                            @case("Packing")
                                                <button class="btn btn-primary" type="button" wire:click='hapusarea("{{ Crypt::encrypt($area) }}")'><b>Packing</b></button>
                                                @break
                                            @case("Pola")
                                                <button class="btn btn-primary" type="button" wire:click='hapusarea("{{ Crypt::encrypt($area) }}")'><b>Pola</b></button>
                                                @break

                                        @endswitch
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </form>
</section>
