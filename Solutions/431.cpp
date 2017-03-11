#include <bits/stdc++.h>
using namespace std;
 
int main(){
    long long int i,j,k,l,m,n,t;
    cin>>t;
    while(t--)
        {
        cin>>n;
        m=0;
        if(n<4)
            {
            m=1;
        }
        else if(n<8)
            {
            m=0;
        }
        else
            {
        for(i=8;i<=n;i*=4)
            {
            m=abs(m-1);
        }
        }
        if(m)
            {
            cout<<"Alice\n";
        }
        else
            {
            cout<<"Bob\n";
        }
    }
    return 0;
} 