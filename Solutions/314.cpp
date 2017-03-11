#include <iostream> 
using namespace std;

int search(int b[],int &k,int &nf,int low,int high)
{
    if(low<=high)
    {
        int mid=(low+high)/2;
        if(b[mid]==b[k])
        {
            b[k]=0;
            k--;
            nf--;
            return 0;
        }
        else if(b[mid]>b[k])
            return search(b,k,nf,low,mid-1);
        else
            return search(b,k,nf,mid+1,high);
    }
    return 1;
}
int main()
{ 
    int i,j,n,q;
    cin>>n;
    int a[n];
    for(i=0;i<n;i++)
        cin>>a[i];
    cin>>q;
    for(j=0;j<q;j++)
    {
        int l,r;
        cin>>l>>r;
        int nf=r-l;
        long long int pro=1;
        int b[nf];
        for(int k=0;k<nf;k++)
        {
            b[k]=a[l+k];
            int chk=search(b,k,nf,0,k-1);
            if(chk)
                pro*=b[k];
        }
        cout<<pro;
    }
	return 0;
}