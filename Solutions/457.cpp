#include<bits/stdc++.h>
using namespace std;
long t,n,pro;
int main()
{
    
    cin>>t;
    while(t--){
        cin>>n;
        pro=1;
        while(n){
            long r=n%10;
            pro*=r;
            n/=10;
        }
        cout<<pro<<"\n";
    }
}
