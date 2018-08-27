#!/bin/sh

serve() {
    pids=()

    run_service() {
        path=$1; port=$2; cd $path
        PORT=$port eval `cat run.sh` &
        pids+=($!)
        echo Serving $path on $port
        cd -
    }

    # CGCTF{Cut&PAsTe_GGeZ}
    run_service ECB 10301

    # GCTF{Di77ie_H3llm8n_Enc4yq7_with_M4n_iN_7hE_MiDdlE_Atk_is_very_Ez}
    run_service MITM 10302

    # CGCTF{BiT_Flip!!!!OOOO}
    run_service CBC 10303

    #read -p '[Press enter to stop]'
    sleep 300
    for pid in ${pids[@]}; do
        pkill -P $pid && echo Killed $pid || echo Failed to kill $pid
    done
}

while true; do serve; done
