#include <iostream>
#include<math.h>
using namespace std;

int main() {
    int t;
    cin>>t;
    for(int i=0;i<t;i++)
    {
        int k;
        long long int n,l=0,now=1,c;
        cin>>n>>k;
        c=n;
        l=(int)log2(c+1);
        int j;
        for(j=1;j<=k;j++)
            now*=j;
        now*=(int)pow(k,l-k);
        if(l<k)
            now=0;
        cout<<(now%1000000007)<<endl;
    }
    return 0;
}