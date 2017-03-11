#include <stdio.h> 

int main() { 
    long long n,t;
    cin>>t;
    while(t--){
        cin>>n;
        long long k;
        while(n!=0){
            int d=n%10;
            if(d==0){
                k=0;
                break;
            }
            k*=d;
            n=n/10;
        }
        cout<<k<<endl;
    }
	return(0);
}