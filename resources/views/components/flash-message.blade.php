<?php
    $successes = session('flash-message-success');
    $errors = session('flash-message-errors');
?>

@if ($successes || $errors)
    <?php $count = 1 ?>

    <div class="flash-message-area" >
        {{-- サクセスメッセージ --}}
        @if ($successes)
            @foreach ($successes as $success)
                <div class="flash-message-box flash-message-success" >
                    {{ $success }}
                    <div class="flash-message-box-close" >×</div>
                </div>
            @endforeach
        @endif

        {{-- エラーメッセージ --}}
        @if ($errors)
            @foreach ($errors as $error)
                <div class="flash-message-box flash-message-error" >
                    {{ $error }}
                    <div class="flash-message-box-close" >×</div>
                </div>
            @endforeach
        @endif
    </div>
@endif
