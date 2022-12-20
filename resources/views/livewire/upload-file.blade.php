<div class="card" style="min-height: 500px">
    <div class="card-header bg-success d-flex justify-content-between">
        <h4 class="text-light">Update Database</h3>
            <button class="btn btn-light btn-sm" wire:click="isUpload">{{ $buttonText }}</button>
    </div>
    <div class="card-body text-center">
        <h4>Upload your excel file to update database</h4>
        @if ($success)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <strong>Success</strong> {{ $message }}
        </div>
        @endif
        
        @if ($isUpload)
            <form wire:submit.prevent="uploadFile">
                <div class="row justify-content-center">
                    <div class="mb-3 col-md-8">
                        
                        <label for="formFileLg" class="form-label">(required types are: xls, csv)</label>
                        <input wire:model="file_to_upload" type="file"
                            class="form-control form-control-lg @error('file_to_upload') is-invalid @enderror">
                        @error('file_to_upload')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <p wire:loading wire:target="uploadFile">
                    Uploading file...
                </p>
                <div>
                    <button type="submit" class="btn btn-lg btn-success text-light" wire:loading.disabled>Upload and
                        Update</button>
                </div>
            </form>
        @else
            @livewire('upload-single-patient')
        @endif

    </div>
</div>
